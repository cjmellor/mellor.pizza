import { endpoints } from '../app'

addEventListener('trix-attachment-remove', event => {
    const attachment = event.attachment

    const data = new FormData()
    data.append('file', attachment.file)

    axios.post(endpoints.delete, data)
        .then(response => response.data)
})
