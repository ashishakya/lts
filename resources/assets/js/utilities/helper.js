export const prepareFormData = (data) => {
    let formData = new FormData()

    function appendFormData(data, label) {
        label = label || ""
        if (data instanceof File) {
            formData.append(label, data)
        } else if (Array.isArray(data)) {
            for (let i = 0; i < data.length; i++) {
                appendFormData(data[i], label + "[" + i + "]")
            }
        } else if (typeof data === "object" && data) {
            for (let key in data) {
                if (data.hasOwnProperty(key)) {
                    if (label === "") {
                        appendFormData(data[key], key)
                    } else {
                        appendFormData(data[key], label + "[" + key + "]")
                    }
                }
            }
        } else {
            if (data !== null && typeof data !== "undefined") {
                formData.append(label, data)
            }
        }
    }

    appendFormData(data)

    return formData
}
