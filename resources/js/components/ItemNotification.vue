<template>
    <div
        class="notification has-cursor-pointer"
        :class="[completed ? 'is-success' : 'is-danger']"
        @click="toggle"
    >
        <!--<button class="delete is-large"></button>-->
        {{ body }}
    </div>
</template>
<script>
export default {
    name: 'ItemNotification',
    props: {
        item: {
            type: Object,
            default() {}
        }
    },
    data() {
        return {
            body: this.item.body,
            completed: this.item.completed,
            id: this.item.id
        }
    },
    methods: {
        toggle() {
            this.completed = !this.completed
        }
    }
}
</script>

<style scoped></style>
