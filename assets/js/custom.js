(function($) {
    $(document).ready(function() {

        //delete student

        $('a#del_id').click(function() {

            let conf = confirm('Are you sure ?');

            if (conf == true) {

                return true;

            } else {

                return false;
            }

        });









    });
})(jQuery)