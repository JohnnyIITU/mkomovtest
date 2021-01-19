<template>
    <div>
        <div class="card mb-3 mt-3">
            <img class="card-img-top" :src="post.image" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{post.title}}</h5>
                <p class="card-text">{{post.text}}</p>
                <p>
                    TAGS : <span class="border border-secondary rounded ml-1 mr-1 pl-1 pr-1 pt-1 pb-1" v-for="tag in tags"> {{tag.tag}} </span>
                </p>
            </div>
            <div class="card-footer">
                LIKES : {{post.likes}}
                <button class="btn btn-success" @click="likePost()">LIKE</button>
                VIEWS : {{post.views}}
            </div>
        </div>
        <div class="media mt-3" v-for="comment in comments">
            <div class="media-body">
                <h5 class="mt-0">{{ comment.subject }}</h5>
                {{ comment.body}}
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Subject" v-model="subject" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <label for="body">Example textarea</label>
                <textarea class="form-control" id="body" v-model="body" rows="3"></textarea>
            </div>
        </div>
        <div class="form-row mt-5">
            <button class="btn btn-success" @click="saveComment()">Send Comment</button>
        </div>
    </div>
</template>
<script>
export default {
    name: "PostCard",
    data() {
        return {
            post : {
                image : null,
                title : null,
                text : null,
                id : null,
            },
            tags : [],
            comments : [],
            subject : null,
            body : null,
        };
    },
    props : {
        postId : Number
    },
    mounted() {
        this.getPost();
        this.incrementView();
    },
    methods: {
        getPost(){
            this.axios.post('/api/posts/get', {
                id : this.postId
            })
            .then(response => {
                this.afterGetPost(response.data)
            });
        },
        afterGetPost(response){
            this.post = response.post;
            this.tags = response.tags;
            this.comments = response.comments;
        },
        incrementView(){
            this.axios.post(`/api/posts/view/${this.postId}`)
            .then(response => {
                this.afterIncrementView(response.data);
            });
        },
        afterIncrementView(response){
            this.post.views = response
        },
        likePost(){
            this.axios.post(`/api/posts/like/${this.postId}`)
            .then(response => {
                this.afterLikePost(response.data);
            });
        },
        afterLikePost(response){
            this.post.likes = response;
        },
        saveComment(){
            this.axios.post(`/api/posts/comment/${this.postId}`, {
                subject : this.subject,
                body : this.body
            })
            .then(response => {
                this.afterSaveComment(response.data)
            });
        },
        afterSaveComment(response){
            this.comments.push({
                subject : this.subject,
                body : this.body
            });
            this.subject = null;
            this.body = null;

        }
    },
}
</script>
