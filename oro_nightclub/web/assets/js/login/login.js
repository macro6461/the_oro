$(document).ready(function () {

/**
 * LOGIN FORM VALIDATION 
 */
    $('#loginAccess').formValidation({
        framework: 'bootstrap',
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        addOns: {
            mandatoryIcon: {
                icon: 'glyphicon glyphicon-asterisk'
            }
        },
        fields: {
            brgusername: {
                validators: {
                    notEmpty: {
                        message: 'The user name is required'
                    },
                    stringLength: {
                        max: 80,
                        message: 'The user name must be less than characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]/,
                        message: 'The user name can only consist of alphabetical, and spaces.'
                    }
                }
            },
            brgpassword: {
                validators: {
                    notEmpty: {
                        message: 'The Password is required'
                    },
                    stringLength: {
                        max: 32,
                        message: 'The Password must be at least 8 characters long'
                    }

                }
            }
        }
    });

});