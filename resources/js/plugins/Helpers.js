const numeral = require('numeral');

export default {
    install(Vue) {
        Vue.filter('priceFormat', value => numeral(value).format('0,0.[00]').replace(/,/g, ' '));

        Vue.filter('dateFormat', function (value) {
            if (value) {
                return moment(String(value)).format("DD.MM.YYYY");
            }
        });

        Vue.filter('dateFormatForHuman', function (value) {
            if (value) {
                return moment(String(value)).format("DD MMMM YYYY");
            }
        });

        Vue.filter('age', function (value) {
            if (value) {
                let birthday = moment().diff(String(value), 'years');
                return birthday;
            }
        });

        Vue.filter('timeFormat', function (value) {
            if (value) {
                return moment(String(value)).format("H:mm")
            }
        });
        Vue.filter('datetimeFormat', function (value, format) {
            if (value) {
                return moment(String(value)).format(format || "DD.MM.YYYY H:mm")
            }
        });

        Vue.prototype.laraPaginate = (data) => {
            let pagination = {}
            let paginate = Object.keys(data).filter(key => {
                return data[key] != data.data
            }).map(key => {
                pagination[key] = data[key]
            })

            return pagination
        },

            Vue.prototype.getIndex = (array, key, value) => {
                return array.findIndex(i => i[key] == value)
            },

            Vue.prototype.$objectPropToArray = (array, key) => {
                let result = [];
                array.map(item => {
                    result.push(item[key])
                });
                return result;
            },

            Vue.prototype.laravelValidation = (err) => {
                if (err.response) {
                    if (err.response.status === 422) {
                        return err.response.data.errors;
                    }
                }
                return {};
            },

            Vue.prototype.$scrollTo = (selector) => {
                let selectedProductsComponent = document.querySelector(selector);
                if (selectedProductsComponent) {
                    selectedProductsComponent.scrollIntoView({behavior: 'smooth', block: 'end'});
                } else {
                    console.log('not found selector');
                }
            },
            Vue.prototype.$checkAllValuesTrue = (obj) => {
                for (let o in obj)
                    if (!obj[o]) return false;

                return true;
            },
            Vue.prototype.$playAudio = async (src) => {
                try {
                    let audio = await new Audio(src);
                    await audio.play();
                } catch (e) {
                    throw e
                }
            },
            Vue.prototype.$phonemask = {
                mask: '+#(###) ###-##-##',
                autoUnmask: true,
                showMaskOnHover: false,
            }
    }
};
