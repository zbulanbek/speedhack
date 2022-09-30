import Errors from './Errors'
import InvalidFeedback from './InvalidFeedback.vue'


class Validator {
    install(Vue){

        Vue.component('invalid-feedback', InvalidFeedback);

        if(Vue.http){
            Vue.http.interceptors.push((request, next) => {
                next(response => {
                    if(response.status === 422){
                        Errors.fill(response.body)
                    }
                });
            });
        }

        if (axios) {
            axios.interceptors.response.use((response) => {
                return response;
            }, (error) => {
                if (error.response.status === 422) {
                    Errors.fill(error.response.data.errors)
                }

                return Promise.reject(error);
            });
        }

        Vue.mixin({
            beforeCreate(){
                this.$options.$errors = {};
                Vue.util.defineReactive(this.$options, '$errors', Errors);
                if(!this.$options.computed){
                    this.$options.computed = {}
                }
                this.$options.computed["$errors"] = function() {
                    return this.$options.$errors;
                };
            },

        })

        Vue.prototype.$errorsReset = () => {
            Errors.flush()
        }
    }

}

export default new Validator()
