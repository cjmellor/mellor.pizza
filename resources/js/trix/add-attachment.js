import { endpointBase, endpoints } from '../app';

addEventListener('trix-attachment-add', (event) => {
    const { attachment } = event;

    if (attachment.file) {
        const data = new FormData();
        data.append('file', attachment.file);

        axios
            .post(endpoints.post, data, {
                onUploadProgress: (event) => {
                    const progress = (event.loaded / event.total) * 100;
                    attachment.setUploadProgress(progress);
                },
            })
            .then((response) => {
                if (response.status === 200) {
                    const url = endpointBase + endpoints.trix + response.data;

                    const attributes = {
                        url,
                        href: `${url}?content-disposition=attachment`,
                    };
                    attachment.setAttributes(attributes);
                }
            });
    }
});
