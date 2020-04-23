export interface ScheduleObject {
  name: string;
  details?: string;
  start: string;
  end?: string;
}
export interface ScheduleObjectSynchronizedLaravelEvents extends ScheduleObject {
  name: string;
  details?: string;
  start: string;
  end?: string;
  event_closing_day: string;
  event_name: string;
  event_details: string;
}

export interface LaravelApiReturnEventsJson {
  data: Array<ScheduleObjectSynchronizedLaravelEvents>;
}
