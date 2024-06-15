tinymce.init({
	selector: 'textarea',
	plugins: [
		"code table"
	],
	/* theme of the editor */
	theme: "modern",
	skin: "lightgray",

	/* width and height of the editor */
	width: "100%",
	height: 300,

	menubar: " file format table tools edit",

	toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | preview | forecolor backcolor emoticons ',
});