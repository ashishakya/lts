import axios from "axios"
import Errors from "./Error"
import {prepareFormData} from "../utilities/helper";

class Form {
    /**
     * Create a new Form instance.
     *
     * @param {object} data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    // commented for future references
    // data() {
    //     let form_data = new FormData();
    //
    //     for (let property in this.originalData) {
    //         if (this[property] instanceof Object) {
    //             this[property].filter(function(data) {
    //                 form_data.append(property, data);
    //             });
    //         } else {
    //             form_data.append(property, this[property]);
    //         }
    //     }
    //     return form_data;
    // }

    /**
     * Fetch all relevant data for the form.
     */
    data() {
        return prepareFormData(this.originalData);
        /*
        Commented for future references:


         let form_data = new FormData();

         for (let property in this.originalData) {
             if (this[property] instanceof Object || this[property] instanceof Array) {
                 Object.entries(this[property]).filter(function ([key, value]) {
                     let newProperty = (property.indexOf('[') > 0) ? property : (property + `[${key}]`);
                     form_data.append(newProperty, value);
                 });
             } else {
                 form_data.append(property, this[property]);
             }
         }

         return form_data;

         */
    }

    /**
     * Reset the form fields.
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = "";
        }

        this.errors.clear();
    }

    /**
     * Send a POST request to the given URL.
     * .
     * @param {string} url
     */
    post(url) {
        return this.submit("post", url);
    }

    /**
     * Send a PUT request to the given URL.
     * .
     * @param {string} url
     */
    put(url) {
        return this.submit("put", url);
    }

    /**
     * Send a PATCH request to the given URL.
     * .
     * @param {string} url
     */
    patch(url) {
        return this.submit("patch", url);
    }

    /**
     * Send a DELETE request to the given URL.
     * .
     * @param {string} url
     */
    delete(url) {
        return this.submit("delete", url);
    }

    /**
     * Submit the form.
     *
     * @param {string} requestType
     * @param {string} url
     */
    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data()).then((response) => {
                this.onSuccess();
                resolve(response.data);
                // window.location = response.data.redirect;
            }).catch(error => {
                this.onFail(error.response.data.errors);
                reject(error.response.data);
            });
        });
    }

    /**
     * Handle a successful form submission.
     *
     * @param {object} data
     */
    onSuccess() {
        this.reset();
    }

    /**
     * Handle a failed form submission.
     *
     * @param {object} errors
     */
    onFail(errors) {
        this.errors.record(errors);
    }
}

export default Form;
