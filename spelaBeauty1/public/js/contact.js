$(document).ready(function(){

    (function($) {
        "use strict";


    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "Morate uneti Ime i Prezime",
                    minlength: "Vaše ime mora sadržati najmanje 2 karaktera"
                },
                subject: {
                    required: "Morate uneti Subject Mejla",
                    minlength: "Subject Mejla mora imati najmanje 4 karaktera"
                },
                number: {
                    required: "Morate uneti broj",
                    minlength: "your Number must consist of at least 5 characters"
                },
                email: {
                    required: "Morate uneti Email"
                },
                message: {
                    required: "Morate uneti neki tekst",
                    minlength: "Tekst je kratak"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    // data: $(form).serialize(),
                    data: {_token:token,unos:$unos},
                    dataType:'json',
                    url: baseUrl + '/doKontakt',
                    // baseUrl + "/doKontakt",
                    success: function(unos,xhr) {
                            console.log(unos);
                            console.log(xhr);
                    },
                    error: function(xhr, error, status) {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                            console.log("Greska");
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        })
                    }
                })
            }
        })
    })

 })(jQuery)
})
