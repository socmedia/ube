jQuery(document).ready(function (e) {
	"use strict";
	e(function () {
		e("#contact").validate({
			rules: {
				name: {
					required: !0,
					minlength: 2
				},
				surname: {
					required: !0,
					minlength: 2
				},
				email: {
					required: !0,
					email: !0
				},
				subject: {
					required: !0
				},
				message: {
					required: !0
				}
			},
			messages: {
				name: {
					required: "Please type your name",
					minlength: "Please type your name correctly"
				},
				surname: {
					required: "Please type your surname",
					minlength: "Please type your surname correctly"
				},
				email: {
					required: "Please type your e-mail correctly"
				},
				subject: {
					required: "Please type your number",
					minlength: "To short number"
				},
				message: {
					required: "Please type your message",
					minlength: "To short message"
				}
			},
			submitHandler: function (r) {
				e(r).ajaxSubmit({
					type: "POST",
					data: e(r).serialize(),
					url: "php/process.php",
					success: function () {
						e("#contact :input").attr("disabled", "disabled"), e("#contact").fadeTo("slow", .15, function () {
							e(this).find(":input").attr("disabled", "disabled"), e(this).find("label").css("cursor", "default"), e("#success").fadeIn()
						})
					},
					error: function () {
						e("#contact").fadeTo("slow", 1, function () {
							e("#error").fadeIn()
						})
					}
				})
			}
		})
	})
});