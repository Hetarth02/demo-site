axios.get('/api/display')
.then(function (response) {
    const picker = document.getElementById('date');
    let date_array = response.data;
    picker.addEventListener('input', function(e) {
        let value = new Date(picker.value);
        date_value = value.getDay();
        if ([0,6].includes(date_value) || date_array.includes(picker.value)) {
            e.preventDefault();
            this.value = '';
            alert('Not available');
        }
    });
})
.catch(function (error) {
    alert('Some Error happened, Try again later or contact the person.');
});