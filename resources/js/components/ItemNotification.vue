<template>
    <transition leave-active-class="animated rollOut">
        <div
            v-if="!deleted"
            class="notification has-cursor-pointer"
            :class="classObject"
            @click="toggle"
        >
            <button
                class="delete is-large has-background-danger"
                @click.stop="done"
            ></button>
            {{ body }}
            <span class="tag is-warning">{{ place }}</span>
        </div>
    </transition>
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
            id: this.item.id,
            place: this.item.place.name,
            deleted: false,
            animate: false
        }
    },
    computed: {
        classObject() {
            return {
                'is-success': this.completed,
                'animated jello': this.animate
            }
        }
    },
    methods: {
        done() {
            axios
                .delete(`/items/${this.id}`)
                .then(response => {
                    this.deleted = response.data.deleted
                })
                .catch(function(error) {
                    console.log(error)
                })
        },
        toggle() {
            this.animate = true
            axios
                .patch(`/items/${this.id}`, {
                    completed: !this.completed
                })
                .then(response => {
                    this.completed = response.data.completed
                    this.animate = false
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>
