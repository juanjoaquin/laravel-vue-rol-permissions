<script>
export default {
    name: 'LessonForm'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import CollectionSelector from '../Common/CollectionSelector.vue';


defineProps({
    form: {
        type: Object,
        required: true
    },

    updating: {
        type: Boolean,
        required: false,
        default: false
    },
    categories: {
        type: Object,
        required: true
    },
    levels: {
        type: Object,
        required: true
    }
})

defineEmits(['submit'])

</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Update Lesson' : 'Create Lesson' }}

        </template>

        <template #description>
            {{ updating ? 'Updated the selected Lesson' : 'Create a new Lesson from scratch' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.name" class="mt-2" />

                <InputLabel for="description" value="Description" />
                <TextInput id="description" v-model="form.description" type="text" autocomplete="description"
                    class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.description" class="mt-2" />

                <InputLabel for="content_uri" value="Content URL" />
                <TextInput id="content_uri" v-model="form.content_uri" type="text" autocomplete="content_uri"
                    class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.content_uri" class="mt-2" />
                <br/>

                <InputLabel value="PDF" />
                
                <SecondaryButton class="mt-2 mr-2" type="button">Upload PDF</SecondaryButton>
                <br/>
                <InputError :message="$page.props.errors.pdf_uri" class="mt-2" />
                <br/>

                <InputLabel for="level_id" value="Level" />
                <div>
                    <div>
                    <select name="level_id" id="level_id" class="rounded">
                        <option v-for="level in levels" :value="level.id">{{ level.name }}</option>
                    </select>
                    <InputError :message="$page.props.errors.level_id" class="mt-2" />
                </div>
                <div>
                    <br/>
                    <InputLabel for="categories" value="Categories" />
                    <CollectionSelector name="categories" id="categories" :collection="categories" />
                </div>
                </div>

            </div>

        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>
    </FormSection>

</template>