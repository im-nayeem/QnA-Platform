const getTime = (time) => {
    var utc = new Date(time);
    var offset = utc.getTimezoneOffset();
    var local = new Date(utc.getTime() - offset * 60000);

    // Format the local time
    var localTimeFormatted = local.toLocaleString([], { year: 'numeric', month: 'numeric', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });

    // Remove the "GMT" and unnecessary strings
    localTimeFormatted = localTimeFormatted.replace("GMT", "").replace("GMT+0000 (Coordinated Universal Time)", "");
    // return localTimeFormatted;
    document.write(localTimeFormatted);
}