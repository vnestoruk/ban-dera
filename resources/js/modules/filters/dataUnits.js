const filterDataUnits =  function(value, decimals = 2) {
    if (!+value) return '0 Bytes'

    const k = 1024
    const dm = decimals < 0 ? 0 : decimals
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']

    const i = Math.floor(Math.log(value) / Math.log(k))

    return `${parseFloat((value / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`
}

export default filterDataUnits;
