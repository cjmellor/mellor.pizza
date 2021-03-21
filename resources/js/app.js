require('./bootstrap')

const endpointBase = process.env.MIX_APP_URL
const endpoints = {
    delete: endpointBase + '/trix/remove-attachment',
    post: endpointBase + '/trix/add-attachment',
    trix: '/storage/trix-attachments/',
}
const csrfToken = document.querySelector('meta[name=\'csrf-token\']').content

export { csrfToken, endpointBase, endpoints }
