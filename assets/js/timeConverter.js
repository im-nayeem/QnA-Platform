const getTime = (time) => {
    const options = {
        year: '2-digit',
        month: 'short',
        day: '2-digit',
        hour: 'numeric',
        minute: 'numeric',
        hour12: true
    };

    const utc = new Date(time);
    const offset = utc.getTimezoneOffset();
    const local = new Date(utc.getTime() - offset * 60000);
    
    // Format the local time
    let localTimeFormatted = local.toLocaleString('en-US', options);
    
    document.write(localTimeFormatted.replace(/,(?=[^,]*$)/, ' -'));
}