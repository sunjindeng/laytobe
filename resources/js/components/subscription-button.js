import numeral from 'numeral'
Vue.component('subscription-button',{
    props:{
        channel:{
          type:Object,
          required: true,
          default:()=>([])
        },
        subscriptions:{
          type :Array,
          required: true,
          default:()=>[]
      }
    },
    computed:{
        subscribed:function () {
          if(!__auth() || this.channel.user_id === __auth().id) return false;
          return !!this.subscription;
      },
        owner:function (){
          if(__auth() && this.channel.user_id === __auth().id) return true;
          return false;
      },
        count(){
            return numeral(this.subscriptions.length).format('0a')
        },
        subscription:function () {
            if(!__auth()) return null;
            return this.subscriptions.find(subscription => subscription.user_id === __auth().id);
        }
    },
    methods:{
        toggleSubscription(){
            if(!__auth()){
                return alert('登录后，在订阅')
            }
            if(this.owner){
                return alert('不能订阅自己的频道！')
            }
            if(this.subscribed){
                //删除订阅记录
                axios.delete(`/channels/{this.channel.id}/subscriptions/{this.subscription.id}`);
            }else{
                //发送添加请求
                axios.post(`/channels/${this.channel.id}/subscription/`)
            }
        }
    }
})
