<template>
    <div class="max-w-3xl mx-auto">
        <div v-show="user !== undefined" class="bg-white rounded shadow-sm p-8 mb-4">
            <div class="mb-4">
                <h2 class="text-black">Add A Comment</h2>
            </div>
            <textarea placeholder="Add a comment"
                      class="bg-grey-lighter rounded leading-normal resize-none w-full py-2 px-3">
            </textarea>
            <div class="mt-3">
                <button class="border border-blue bg-blue text-white hover:bg-blue-dark py-2 px-4 rounded tracking-wide mr-1">Save</button>
                <button class="border border-grey-darker text-grey-darker hover:bg-grey-dark hover:text-white py-2 px-4 rounded tracking-wide ml-1">Cancel</button>
            </div>
        </div>
        
        <div class="mb-4">
            <h2 class="text-black">Comments</h2>
        </div>
        <div class="bg-white rounded shadow-sm p-8">
            I'm an Comments component.
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                required: true,
                type: Object,
            }
        },
        mounted() {
            console.log('Comments Component mounted.')
        }
    }
</script>
