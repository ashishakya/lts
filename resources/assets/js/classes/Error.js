import Vue from "vue"

class Errors {
    /**
     * Create a new Errors instance.
     */
    constructor() {
        this.errors = {}
    }

    /**
     * Determine if an errors exists for the given field.
     *
     * @param {string} field
     */
    has(field) {
        let _self = this
        if (field instanceof Array) {
            field.forEach(function(fieldName) {
                if (_self.errors.hasOwnProperty(fieldName)) {
                    return _self.errors.hasOwnProperty(fieldName)
                }
            })
        }
        return this.errors.hasOwnProperty(field)
    }

    /**
     * Determine if we have any errors.
     */
    any() {
        return Object.keys(this.errors).length > 0
    }

    /**
     * Return all error array
     * @returns {Array}
     */
    all() {
        let self = this
        let errorBag = []
        Object.keys(this.errors).filter(
            function(data) {
                errorBag.push(self.get(data))
            },
        )
        return errorBag
    }

    /**
     * Retrieve the error message for a field.
     *
     * @param {string} field
     */
    get(field) {
        if (this.errors[field]) {
            return Array.isArray(this.errors[field]) ? this.errors[field][0] : this.errors[field]
        }
    }

    /**
     * Record the new errors.
     *
     * @param {object} errors
     */
    record(errors) {
        this.errors = errors
        console.log(this.errors);
    }

    /**
     * Clear one or all error fields.
     *
     * @param {string|null} field
     */
    clear(field) {
        if (field) {
            let arrayName = field.toString().replace(/[\[\]']+/g, ".").replace(/\.$/, "")

            Vue.delete(this.errors, arrayName)

            return
        }

        this.errors = {}
    }
}

export default Errors
