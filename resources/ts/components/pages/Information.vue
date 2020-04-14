<template>
  <v-content>
    <v-container>
      <v-row class="fill-height">
        <v-col>
          <v-sheet height="64">
            <v-toolbar flat color="white">
              <v-btn outlined class="mr-4" @click="setToday">Today</v-btn>
              <v-btn fab text small @click="prev">
                <v-icon small>mdi-chevron-left</v-icon>
              </v-btn>
              <v-btn fab text small @click="next">
                <v-icon small>mdi-chevron-right</v-icon>
              </v-btn>
              <v-toolbar-title>{{ title() }}</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-menu bottom right>
                <template v-slot:activator="{ on }">
                  <v-btn outlined v-on="on">
                    <span>{{ typeToLabel[type] }}</span>
                    <v-icon right>mdi-menu-down</v-icon>
                  </v-btn>
                </template>
                <v-list>
                  <v-list-item @click="type = 'day'">
                    <v-list-item-title>Day</v-list-item-title>
                  </v-list-item>
                  <v-list-item @click="type = 'week'">
                    <v-list-item-title>Week</v-list-item-title>
                  </v-list-item>
                  <v-list-item @click="type = 'month'">
                    <v-list-item-title>Month</v-list-item-title>
                  </v-list-item>
                  <v-list-item @click="type = '4day'">
                    <v-list-item-title>4 days</v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
            </v-toolbar>
          </v-sheet>
          <v-sheet height="600">
            <v-calendar
              locale="ja-jp"
              :day-format="timestamp => new Date(timestamp.date).getDate()"
              :month-format="
                timestamp => new Date(timestamp.date).getMonth() + 1 + ' /'
              "
              ref="calendar"
              v-model="focus"
              color="primary"
              :events="events"
              :event-color="'blue'"
              :event-margin-bottom="3"
              :now="today"
              :type="type"
              @click:event="showEvent"
              @click:more="viewDay"
              @click:date="viewDay"
              @change="updateRange"
            ></v-calendar>
            <v-menu
              v-model="selectedOpen"
              :close-on-content-click="false"
              :activator="selectedElement"
              fluid
              offset-x
            >
              <v-card color="grey lighten-4" min-width="350px" flat v-if="selectedEvent">
                <v-toolbar :color="'blue'" dark>
                  <v-btn icon>
                    <v-icon>mdi-pencil</v-icon>
                  </v-btn>
                  <v-toolbar-title v-html="selectedEvent.name"></v-toolbar-title>
                  <v-spacer></v-spacer>
                  <v-btn icon>
                    <v-icon>mdi-heart</v-icon>
                  </v-btn>
                  <v-btn icon>
                    <v-icon>mdi-dots-vertical</v-icon>
                  </v-btn>
                </v-toolbar>
                <v-card-text>
                  <span v-html="selectedEvent.details"></span>
                </v-card-text>
                <v-card-actions>
                  <v-btn text color="secondary" @click="selectedOpen = false">Cancel</v-btn>
                </v-card-actions>
              </v-card>
            </v-menu>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
  </v-content>
</template>

<script lang="ts">
import {
  ScheduleDataObject,
  LaravelScheduleObject,
  ScheduleDataObjectFromLaravel
} from "../../vue-data-entity/ScheduleDataObject";
import { Vue, Component, Watch } from "vue-property-decorator";
import axios, { AxiosError, AxiosRequestConfig, AxiosResponse } from "axios";
// import camelCaseKeys from "camelcase-keys";
import * as Moment from "moment";
import {
  CalendarTimestamp,
  CalendarFormatter,
  CalendarEventParsed,
  CalendarEventVisual,
  CalendarEventColorFunction,
  CalendarEventNameFunction,
  CalendarDaySlotScope,
  CalendarDayBodySlotScope,
  CalendarEventOverlapMode
} from "vuetify/types";

// import { v-calendar } from 'v-calendar'FD

@Component
export default class Information extends Vue {
  // events: Array<ScheduleDataObject> = [];

  private get calendarInstance(): Vue & {
    prev: () => void;
    next: () => void;
    getFormatter: (options: object) => CalendarFormatter;
    checkChange(): () => void;
  } {
    return this.$refs.calendar as Vue & {
      prev: () => void;
      next: () => void;
      getFormatter: (options: object) => CalendarFormatter;
      checkChange(): () => void;
    };
  }

  today: string = Moment().format("2019-01-01");
  focus: string = Moment().format("2019-01-01");
  type: string = "month";
  typeToLabel: object = {
    month: "Month",
    week: "Week",
    day: "Day",
    "4day": "4 Days"
  };
  start: CalendarTimestamp | null = null;
  end: CalendarTimestamp | null = null;
  selectedEvent: ScheduleDataObject | null = null;
  selectedElement: HTMLInputElement | null = null;
  selectedOpen: boolean = false;
  events: Array<LaravelScheduleObject> = [];
  public getEvents() {
    Vue.prototype.$http
      .get(`/api/event`)
      .then((res: AxiosResponse<ScheduleDataObjectFromLaravel>): void => {
        this.events = res.data.data;
        console.log("results");
        console.log(res);
        console.log(this.events);
      })
      .catch((error: AxiosError): void => {
        alert("検索実行時にエラーが発生しました");
      });
  }
  public created() {
    this.getEvents();
    console.log(this.events[0].name);
    // console.log("result2");
    // console.log(this.events);
  }

  // events: Array<LaravelScheduleObject> = [
  //   {
  //     name: "Vacation",
  //     details: "Going to the beach!",
  //     start: Moment().format("2018-12-29"),
  //     end: Moment().format("2019-01-01")
  //   },
  //   {
  //     name: "Meeting",
  //     details: "Spending time on how we do not have enough time",
  //     start: Moment().format("2019-01-07 09:00"),
  //     end: Moment().format("2019-01-07 09:30")
  //   },
  //   {
  //     name: "Large Event",
  //     details:
  //       "This starts in the middle of an event and spans over multiple events",
  //     start: Moment().format("2018-12-31"),
  //     end: Moment().format("2019-01-04")
  //   },
  //   {
  //     name: "3rd to 7th",
  //     details: "Testing",
  //     start: Moment().format("2019-01-03"),
  //     end: Moment().format("2019-01-07")
  //   },
  //   {
  //     name: "Big Meeting",
  //     details: "A very important meeting about nothing",
  //     start: Moment().format("2019-01-07 08:00"),
  //     end: Moment().format("2019-01-07 11:30")
  //   },
  //   {
  //     name: "Another Meeting",
  //     details: "Another important meeting about nothing",
  //     start: Moment().format("2019-01-07 10:00"),
  //     end: Moment().format("2019-01-07 13:30")
  //   },
  //   {
  //     name: "7th to 8th",
  //     start: Moment().format("2019-01-07"),
  //     end: Moment().format("2019-01-08")
  //   },
  //   {
  //     name: "Lunch",
  //     details: "Time to feed",
  //     start: Moment().format("2019-01-07 12:00"),
  //     end: Moment().format("2019-01-07 15:00")
  //   },
  //   {
  //     name: "30th Birthday",
  //     details: "Celebrate responsibly",
  //     start: Moment().format("2019-01-03")
  //   },
  //   {
  //     name: "New Year",
  //     details: "Eat chocolate until you pass out",
  //     start: Moment().format("2019-01-01"),
  //     end: Moment().format("2019-01-02")
  //   },
  //   {
  //     name: "Conference",
  //     details: "The best time of my life",
  //     start: Moment().format("2019-01-21"),
  //     end: Moment().format("2019-01-28")
  //   },
  //   {
  //     name: "Hackathon",
  //     details: "Code like there is no tommorrow",
  //     start: Moment().format("2019-01-30 23:00"),
  //     end: Moment().format("2019-02-01 08:00")
  //   },
  //   {
  //     name: "event 1",
  //     start: Moment().format("2019-01-14 18:00"),
  //     end: Moment().format("2019-01-14 19:00")
  //   },
  //   {
  //     name: "event 2",
  //     start: Moment().format("2019-01-14 18:00"),
  //     end: Moment().format("2019-01-14 19:00")
  //   },
  //   {
  //     name: "event 5",
  //     start: Moment().format("2019-01-14 18:00"),
  //     end: Moment().format("2019-01-14 19:00")
  //   },
  //   {
  //     name: "event 3",
  //     start: Moment().format("2019-01-14 18:30"),
  //     end: Moment().format("2019-01-14 20:30")
  //   },
  //   {
  //     name: "event 4",
  //     start: Moment().format("2019-01-14 19:00"),
  //     end: Moment().format("2019-01-14 20:00")
  //   },
  //   {
  //     name: "event 6",
  //     start: Moment().format("2019-01-14 21:00"),
  //     end: Moment().format("2019-01-14 23:00")
  //   },
  //   {
  //     name: "event 7",
  //     start: Moment().format("2019-01-14 22:00"),
  //     end: Moment().format("2019-01-14 23:00")
  //   }
  // ];

  public title(): string {
    const { start, end } = this;
    if (!start || !end) {
      return "";
    }

    const startMonth = 1 + Moment(start.date).month();
    const endMonth = 1 + Moment(end.date).month();
    const suffixMonth = startMonth === endMonth ? "" : endMonth;

    const startYear = start.year;
    const endYear = end.year;
    const suffixYear = endYear;

    const startDay = start.day;
    const endDay = end.day;

    switch (this.type) {
      case "month":
        return `${startYear}年${startMonth}月`;
      case "week":
      case "4day":
        return `${startYear}年${startMonth}月${startDay}日 - ${suffixYear}年${suffixMonth}月${endDay}日`;
      case "day":
        return `${startYear}年${startMonth}月${startDay}日`;
    }
    return "";
  }
  monthFormatter(): CalendarFormatter {
    return this.calendarInstance.getFormatter({
      timeZone: "Asia/Tokyo",
      month: "long"
    });
  }

  viewDay({ date }: { date: string }) {
    this.focus = date;
    this.type = "day";
  }

  setToday() {
    this.focus = this.today;
  }
  prev(): void {
    this.calendarInstance.prev();
  }
  next(): void {
    this.calendarInstance.next();
  }
  showEvent({
    nativeEvent,
    event
  }: {
    nativeEvent: HTMLElementEvent<HTMLInputElement>;
    event: ScheduleDataObject;
  }) {
    const open = () => {
      this.selectedEvent = event;
      this.selectedElement = nativeEvent.target;
      setTimeout(() => (this.selectedOpen = true), 10);
    };

    if (this.selectedOpen) {
      this.selectedOpen = false;
      setTimeout(open, 10);
    } else {
      open();
    }

    nativeEvent.stopPropagation();
  }
  updateRange({
    start,
    end
  }: {
    start: CalendarTimestamp;
    end: CalendarTimestamp;
  }) {
    this.start = start;
    this.end = end;
  }
  nth(d: number): string {
    return d > 3 && d < 21
      ? "th"
      : ["th", "st", "nd", "rd", "th", "th", "th", "th", "th", "th"][d % 10];
  }
}

interface HTMLElementEvent<T extends HTMLElement> extends Event {
  target: T;
}
</script>
