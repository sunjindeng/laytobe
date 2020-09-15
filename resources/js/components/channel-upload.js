Vue.component('channels-upload',{
    props:{
        channel:{
          type:Object,
          required:true,
          default:()=>({})
      }
    },
    data:()=>({
        selected:false,
        videos:[],
        progress:{}
    }),
    methods:{
        upload(){
            this.selected = true;
            this.videos = Array.from(this.$refs.videos.files);
            console.log(this.videos)
            console.log(this.channel.id)
            const uploaders = this.videos.map(video=>{
                const form = new FormData();
                form.append('video',video);
                form.append('title',video.name);
                return axios.post(`/channel/${this.channel.id}/videos`,form,{
                    onUploadProgress:(event)=>{
                        this.progress[video.name] = Math.ceil(event.loaded/event.total)*100
                        this.$forceUpdate();
                    }
                })
            })

        }
    }
})
