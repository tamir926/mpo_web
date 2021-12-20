/**
 * DataTables Basic
 */

$(function() {
    'use strict';

    var dt_basic_table = $('.datatables-basic'),
        assetPath = 'app-assets/';

    if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
    }


    // Add New record
    // ? Remove/Update this code as per your requirements ?
    var count = 101;
    $('.data-submit').on('click', function() {
        var $new_name = $('.add-new-record .dt-full-name').val(),
            $new_post = $('.add-new-record .dt-post').val(),
            $new_email = $('.add-new-record .dt-email').val(),
            $new_date = $('.add-new-record .dt-date').val(),
            $new_salary = $('.add-new-record .dt-salary').val();

        if ($new_name != '') {
            dt_basic.row
                .add({
                    responsive_id: null,
                    id: count,
                    full_name: $new_name,
                    post: $new_post,
                    email: $new_email,
                    start_date: $new_date,
                    salary: '$' + $new_salary,
                    status: 5
                })
                .draw();
            count++;
            $('.modal').modal('hide');
        }
    });

    // Delete Record
    $('.datatables-basic tbody').on('click', '.delete-record', function() {
        dt_basic.row($(this).parents('tr')).remove().draw();
    });

});