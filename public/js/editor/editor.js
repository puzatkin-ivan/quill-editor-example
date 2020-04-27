const imageHandler = () => {
    const input = document.createElement('input');

    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.click();

    input.onchange = () => {
        const file = input.files[0];

        uploadFile(file);
    }
}

const processResponse = (response) => {
    const id = response[0];
    const range = quill.getSelection(true);
    const link = `${ROOT_URL}/${id}`;

    quill.insertEmbed(range.index, 'image', link);
    quill.setSelection(range.index + 1);
}

const uploadFile = (file) => {
    const formData = new FormData();
    formData.append('image', file);
    $.ajax({
        url: '/image/upload',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
    }).done(processResponse)
}

var quill = new Quill('#editor-container', {
    modules: {
        formula: true,
        syntax: true,
        toolbar: {
            container: '#toolbar-container',
            handlers: {
                image: imageHandler,
            }
        }
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
});