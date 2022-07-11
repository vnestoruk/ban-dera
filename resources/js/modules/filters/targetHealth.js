const filterTargetHealth =  function(value) {
    return value ? Math.round(value * 100) + '%' : '0%';
}

export default filterTargetHealth;
