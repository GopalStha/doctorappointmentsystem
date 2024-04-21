<template>
    <div>
        <div class="form-group" v-for="(input, index) in inputs" :key="index">
            <input type="text" name="medicine[]" class="form-control" v-model="input.medicine"
                :placeholder="`Medicine ${index + 1}`" required />
            <span>
                <a href="" @click.prevent.stop="add(index)" v-show="index + 1 === inputs.length" style="color: green">
                    Add More
                </a>
                <a href="" @click.prevent.stop="remove(index)" v-show="inputs.length > 1">
                    Remove
                </a>
            </span>
        </div>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            inputs: [
                {
                    medicine: '',
                },
            ],
        };
    },
    methods: {
        add(index) {
            this.inputs.splice(index + 1, 0, { medicine: '' });
        },
        remove(index) {
            if (this.inputs.length > 1) {
                this.inputs.splice(index, 1);
            }
        },
    },
};
</script>
  