<template>
    <div class="max-w-3xl mx-auto">
        <div v-show="user !== undefined" class="bg-white rounded shadow-sm p-8 mb-4">
            <div class="mb-4">
                <h2 class="text-black">Comments</h2>
            </div>
            <textarea v-model="data.body"
                      placeholder="Add a comment"
                      class="bg-grey-lighter rounded leading-normal resize-none w-full py-2 px-3"
                      @focus="startEditing">
            </textarea>
            <div class="mt-3">
                <button class="border border-blue bg-blue text-white hover:bg-blue-dark py-2 px-4 rounded tracking-wide mr-1" @click="saveComment">Save</button>
                <button class="border border-grey-darker text-grey-darker hover:bg-grey-dark hover:text-white py-2 px-4 rounded tracking-wide ml-1" @click="stopEditing">Cancel</button>
            </div>
        </div>
        <div class="bg-white rounded shadow-sm p-8">

            <div class="mb-4">
                <h2 class="text-black">Comments</h2>
            </div>
            <div class="bg-white rounded shadow-sm p-8">
                <div v-for="comment in comments" :key="comment.id">
                    <div class="text-grey-dark leading-normal text-sm">
                        <p>{{ comment.author.name}} <span class="mx-1 text-xs">&bull;</span> {{ comment.created_at}}</p>
                        
                    </div>
                    <p>{{comment.body}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                required: true,
                type: Object,
            },
            post_id: ''
        },
        data: function() {
            return {
                data: {
                    body: '',
                    post_id: ''
                },
                comments: []
            }
        },
        created() {
            this.fetchComments();
        },
        
        methods: {
            fetchComments() {
                const t = this;

                axios.get('/comments/'+this.post_id)
                    .then(({data}) => {
                        t.comments = data;
                    })
            },
            saveComment() {
                const t = this;
                axios.post('/comments', t.data)
                    .then(({data}) => {
                        t.comments.unshift(data);
                        t.stopEditing();
                    })
            },
            startEditing() {
                this.data.post_id = this.post_id;
            },
            stopEditing() {
                this.data.body = '';
            },
        }
    }
</script>
