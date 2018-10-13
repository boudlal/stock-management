<template>
    <vue-event-calendar :events="demoEvents">
        <template scope="props">
            <div>
                <div style="text-align: center">
                    <button class="btn" data-toggle="modal" data-target="#smallmodal"><i class="fa fa-plus-square"></i> Add new</button>
                </div>
                <div id="cancel-model" > 
                  <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" style="display: none;" aria-hidden="true">
                    <div  class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Add new Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <strong style="text-align: center; color: red">
                                {{ error }}
                              </strong>
                              <br />

                              <form action="" method="post" novalidate="novalidate">

                                    <div class="form-group">
                                        <label for="title" class="control-label mb-1">Title</label>
                                        <input v-model="addInputs.title" name="title" class="form-control" required type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Description</label>
                                        <input  name="desc"  v-model="addInputs.desc" class="form-control" required type="text">
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label mb-1">Date</label>
                                        <input name="day" class="form-control cc-exp" v-model="addInputs.date" type="date" >
                                    </div>
                                  </form>

                                    <div>
                                        <button href="#cancel" id="payment-button" v-on:click="addItem" class="btn btn-lg btn-info btn-block">
                                            submit
                                        </button>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button ref="cancel" id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div v-for="(event, index) in props.showEvents" class="event-item">
                    <h3 class="title">{{index+1}}. {{event.title}}</h3>
                    <p class="time">{{ event.date }}</p>
                    <p class="desc">{{event.desc}}</p>
                    <p style="text-align: right"><button v-on:click="deleteItem(event.id, index)"><i style="color: red" class="fa fa-minus-circle"></i></button></p>
                </div>
            </div>
        </template>
    </vue-event-calendar>
</template>

<script>
    export default {
        data () {
            return {
                error: '',
                demoEvents: [],
                addInputs: {
                  title: '',
                  desc: '',
                  date: ''
                }
            }
        },
        methods: {
            Item(){
                axios.get('calendar/all')
                    .then(response => this.demoEvents = response.data)
            },
            deleteItem(id, index){
                axios.get(`calendar/delete/${id}`)
                    .then(this.demoEvents.splice(index))
            },
            addItem(){
              if (this.addInputs.title === '' | this.addInputs.desc === '' | this.addInputs.date === '') {
                  this.error = 'Please fill all input'
              }else {
                axios.post('calendar/add', {
                  title: this.addInputs.title,
                  desc: this.addInputs.desc,
                  date: this.addInputs.date,
                }).then(
                  this.error = '',
                  this.demoEvents.push({
                    'title': this.addInputs.title,
                    'desc': this.addInputs.desc,
                    'date': this.addInputs.date,
                  }),
                  $('#cancel-model').trigger("click")
                )
              }



            }
        },
        created(){
            this.Item();
        },

    }
</script>
