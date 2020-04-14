export interface ScheduleDataObject {
  name: string;
  details?: string;
  start: string;
  end?: string;
  color?: string;
}
export class LaravelScheduleObject implements ScheduleDataObject {
  _name: string;
  _details?: string;
  _start: string;
  _end?: string;
  color?: string;
  event_closing_day: string;
  event_name: string;
  event_details: string;
  event_reference_url: string;
  constructor(
    event_name: string,
    event_details: string,
    event_closing_day: string,
    event_reference_url: string
  ) {
    this.event_name = event_name;
    this.event_details = event_details;
    this.event_reference_url = event_reference_url;
    this.event_closing_day = event_closing_day;
    this._name = this.event_name;
    this._details = this.event_details;
    this._start = this.event_closing_day;
    this._end = this.event_closing_day;
  }
  get name(): string {
    return this.event_name;
  }
  set name(value: string) {
    this._name = this.event_name;
  }
  get details(): string {
    return this.event_details;
  }
  set details(value: string) {
    this.details = this.event_details;
  }
  get start(): string {
    return this.event_closing_day;
  }
  set start(value: string) {
    this._start = this.event_closing_day;
  }
  get end(): string {
    return this.event_closing_day;
  }
  set end(value: string) {
    this._end = this.event_closing_day;
  }
}

export interface ScheduleDataObjectFromLaravel {
  // current_page: number;
  // data: KoseiObject;
  data: Array<LaravelScheduleObject>;

  // first_page_url: string;
  // from: number;
  // last_page: number;
  // last_page_url: string;
  // next_page_url: string;
  // path: string;
  // per_page: number;
  // prev_page_url: string | null;
  // to: number;
  // total: number;
}
