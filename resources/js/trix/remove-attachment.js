import { endpoints } from '../app';

addEventListener('trix-attachment-remove', (event) => {
    const { attachment } = event;

    const data = new FormData();
    data.append('file', attachment.file);

    axios.post(endpoints.delete, data).then((response) => response.data);
});
