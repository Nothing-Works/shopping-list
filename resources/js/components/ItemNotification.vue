<template>
    <div
        class="notification has-cursor-pointer"
        :class="[completed ? 'is-success' : '']"
        @click="toggle"
    >
        <button
            class="delete is-large has-background-danger"
            @click.stop="done"
        ></button>
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
        done() {
            console.log('clicked')
        },
        toggle() {
            axios
                .patch(`/items/${this.id}`, {
                    completed: !this.completed
                })
                .then(({ data }) => {
                    this.completed = data.completed
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>
