$(function(){
    $('#budget-input').on('focus', function(){
        $('.budget-feedback').hide();
    })

    $('#expense-input, #amount-input, #edit-expense-input, #edit-amount-input').on('focus', function(){
        $('.expense-feedback').hide();
    })



    $('#budget-form').on('submit', function(e){
        e.preventDefault();
        let budget = parseInt($('#budget-input').val()) || 0;
        if(budget <= 0) {
            $('.budget-feedback').show();
        } else {
            $('#budget-amount').text(budget);
            $('#balance-amount').text(budget - parseInt($('#expense-amount').text()));
        }
        
        balanceColor()
    })

    $('#expense-form').on('submit', function(e){
        e.preventDefault();
        let expenseDesc = $('#expense-input').val();
        let expenseAmount = parseInt($('#amount-input').val()) || 0;

        if(expenseAmount <= 0 || expenseDesc == '') {
            $('.expense-feedback').show();
        } else {
            $('#expense-list').show();
            let expenses = parseInt($('#expense-amount').text());
            let totalExpenses = expenses + expenseAmount;
            $('#expense-amount').text(totalExpenses);

            let balance = parseInt($('#balance-amount').text());
            let newBalance = balance - expenseAmount;
            $('#balance-amount').text(newBalance);

            let row = $(`<div class="row showRed">
                                <div class="col-4 text-center mb-2 text-uppercase">
                                    <p>- ${expenseDesc}</p>
                                </div>
                                <div class="col-4 text-center">
                                    <p>- ${expenseAmount}</p>
                                </div>
                            </div>`);
            $('#expense-list').append(row);

            let div = $(`<div class="col-4 text-center"></div>`)

            let btnEdit = $('<button class="edit-icon btn"><i class="fas fa-edit"></i></button>')
            btnEdit.on('click',function(e){
                $('#amount-input').val(expenseAmount);
                $('#expense-input').val(expenseDesc);
                row.remove();


            })

            let btnDelete = $('<button class="delete-icon btn"><i class="fas fa-trash-alt"></i></i></button>')
            btnDelete.on('click',function(e){
                let updateBalance = parseInt($('#expense-amount').text()) - expenseAmount;
                $('#expense-amount').text(updateBalance);
                let updateExpense = parseInt($('#balance-amount').text()) + expenseAmount;
                $('#balance-amount').text(updateExpense);
                row.remove();

                if ($('#expense-list').children().length == 1) {
                    $('#expense-list').hide();
                }
            })


            div.append(btnEdit);
            div.append(btnDelete);
            row.append(div);

            balanceColor()
            $('#amount-input').val('');
            $('#expense-input').val('');


        }

        

    })

    
    function balanceColor(){
        let balance = parseInt($('#balance-amount').text());
        if(balance > 0) {
            $('#balance').css({'color': '#317b22'})
        } else {
            $('#balance').css({'color': '#b80c09'})
        }
    }

})