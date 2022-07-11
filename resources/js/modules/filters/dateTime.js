import {DateTime} from "luxon";

const filterDateTime =  function(value) {
    return DateTime.fromISO(value).toLocaleString(DateTime.DATETIME_SHORT);
}

export default filterDateTime;
