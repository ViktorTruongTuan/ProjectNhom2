$(document).ready(() => {
    increase = (id) => {
        let inputval = parseInt($('#' + id).val())
        inputval += 1
        $('#' + id).val(inputval)
    }
    decrease = (id) => {
        let inputval = parseInt($('#' + id).val())
        inputval -= 1
        if (inputval <= 0) {
            $('#' + id).val(0)
        } else {
            $('#' + id).val(inputval)
        }
    }
    buyproduct = (id) => {
        console.log(id)
        let inputval = $('#' + id).val()
        $('.' + id).attr('href', `cart/${id}/${inputval}`)
        console.log()
    }

})