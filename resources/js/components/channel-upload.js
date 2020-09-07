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
        videos:[]
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
                form.append('channels_id',this.channel.id)
                return axios.post(`/channel/${this.channel.id}/videos`,form)
            })

        }
    }
})
