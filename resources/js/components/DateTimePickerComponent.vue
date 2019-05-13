<template>
    <VueCtkDateTimePicker v-model="datetime"
        format="YYYY-MM-DD HH:mm"
        :no-value-to-custom-elem="true"
        @formatted-value="handleClick(123)">
        <slot></slot>
    </VueCtkDateTimePicker>
</template>

<script>
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
    import moment from 'moment';

    export default {
        components: {
            VueCtkDateTimePicker
        },
        methods: {
            handleClick(f) {
                console.log(f);
                this.$slots.default[0].data.attrs.value = f;
              }
        },
        data() {
            return {
                datetime: moment().format('YYYY-MM-DD HH:mm')
            }
        },
        mounted() {
            console.log(moment().format('MMMM Do YYYY, h:mm:ss a'))
        }
    }
</script>
