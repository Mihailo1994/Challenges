$(function(){

    let edit = false;
    let number = 1;
    let id = 0;
    let oldExpenseDesc = '';
    let oldExpenseAmount = 0;

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
        
        if(edit === false) {
            
            let expenseDesc = $('#expense-input').val();
            let expenseAmount = parseInt($('#amount-input').val()) || 0;

            if(expenseAmount <= 0 || expenseDesc == '') {
                $('.expense-feedback').show();
            } else {
                $('#expense-list').show();
                let expenses = parseInt($('#expense-amount').text());
                let totalExpenses = expenses + expenseAmount;
                $('#expense-amount').text(totalExpenses);

                let currentBudget = parseInt($('#budget-amount').text());
                let newBalance = currentBudget - totalExpenses;
                $('#balance-amount').text(newBalance);

                let row = $(`<div class="row showRed">
                                    <div class="col-4 text-center mb-2 text-uppercase">
                                        <p>- <span id="expense-description-${number}">${expenseDesc}</span></p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p>- <span id="expense-amount-${number}">${expenseAmount}</span></p>
                                    </div>
                                </div>`);
                $('#expense-list').append(row);

                let div = $(`<div class="col-4 text-center"></div>`)

                let btnEdit = $(`<button class="edit-icon btn"><i class="fas fa-edit" id=${number}></i></button>`)

                btnEdit.on('click',function(e){
                    edit = true;
                    id = (e.target.id);
                    oldExpenseDesc = $('#expense-description-'+id).text();
                    oldExpenseAmount = parseInt($('#expense-amount-'+id).text()) || 0;

                    $('#expense-input').val(oldExpenseDesc);
                    $('#amount-input').val(oldExpenseAmount);
                    
                    $('#expense-form').on('submit', function(e){
                         e.preventDefault();

                            if(edit === true) {
                                let newExpenseDesc = $('#expense-input').val();
                                let newExpenseAmount = parseInt($('#amount-input').val());
                                
                                $('#expense-description-'+id).text(newExpenseDesc);
                                $('#expense-amount-'+id).text(newExpenseAmount);

                                let expenses = parseInt($('#expense-amount').text());
                                let updatedExpense = expenses - oldExpenseAmount + newExpenseAmount;
                                $('#expense-amount').text(updatedExpense);

                                let budget = parseInt($('#budget-amount').text()) || 0;
                                let updatedBalance = budget - updatedExpense;
                                $('#balance-amount').text(updatedBalance);

                                balanceColor();
                                $('#expense-input').val('');
                                $('#amount-input').val('');
                                edit = false;
                            }
                    })
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

                    balanceColor();
                })


                div.append(btnEdit);
                div.append(btnDelete);
                row.append(div);

                balanceColor();
                $('#amount-input').val('');
                $('#expense-input').val('');
            }

            number++;
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