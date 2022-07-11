const filterPrice =  function(value, fractionDigits = 2, prefix = '$', suffix = '') {
    return prefix + (value / 100).toFixed(fractionDigits) + suffix;
}

export default filterPrice;
