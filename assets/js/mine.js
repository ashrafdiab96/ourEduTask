/**
 * FILE NAME: MINE.JS
 * DEVELOPER NAME: ASHRAF DIAB
 * DESCRIPTION: HAS ALL JAVASCRIPT FUNCTIONS FOR THE PROGRAM
 */

/**
 * getData @method
 * function to send ajax request and fetch the data
 * @param {*} action 
 * @param {*} val 
 * @param {*} val2 
 */
const getData = (action, val, val2) => {
    $.ajax({
        type: 'get',
        url: 'components/api.php?action='+action,
        data: {val, val2},
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function(response) {
            console.log(response);

            $("#tableBody").empty();
            $.each(response, (key, value) => {
                $("#tableBody").append(
                    `<tr key="`+key+`">
                    <td> `+ value.id +` </td>
                    <td> `+ value.paidAmount +` </td>
                    <td> `+ value.Currency +` </td>
                    <td> `+ value.parentEmail +` </td>
                    <td> `+ checkStatus(value.statusCode) +` </td>
                    <td> `+ value.paymentDate +` </td>
                    <td> `+ value.parentIdentification +` </td>
                    <td> `+ value.balance +` </td>
                    <td> `+ value.currency +` </td>
                    <td> `+ value.email +` </td>
                    <td> `+ value.created_at +` </td>
                    <td> `+ value.customId +` </td>
                    </tr>'`
                );
            });
    
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("Status: " + textStatus + "Error: " + errorThrown);
        }
    });
};

/** call getData() @method to fetch the data at the first time */
getData('all', null);

/**
 * checkStatus @method
 * function to check transaction status
 * @param {*} status 
 */
const checkStatus = (status) => {
    if(status == 1) {
        return 'Authorized';
    } else if(status == 2) {
        return 'Decline';
    }
    return 'Refunded';
}

/**
 * filterByStatus @method
 * function to filter data by status
 * @param {*} status 
 */
const filterByStatus = (status) => {
    getData('statusFilter', status, null);
}

/**
 * filterByCurrency @method
 * function to filter data by currency
 * @param {*} currency 
 */
const filterByCurrency = (currency) => {
    getData('currencyFilter', currency, null);
}

/**
 * amountFilter @method
 * function to filter data by amount range
 */
const amountFilter = () => {
    let fromAmount = $("input[name=fromAmouunt]").val();
    let toAmouunt = $("input[name=toAmouunt]").val();
    getData('amuntFilter', fromAmount, toAmouunt);
}

/**
 * dateFilter @method
 * function to filter data by date range
 */
 const dateFilter = () => {
    let fromDate = $("input[name=fromDate]").val();
    let toDate = $("input[name=toDate]").val();
    getData('dateFilter', fromDate, toDate);
}

