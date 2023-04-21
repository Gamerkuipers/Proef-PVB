<div>
    <x-form wire:submit.prevent="save">
        <div class="grid lg:grid-cols-2 lg:w-full gap-8">
            <x-form.section>
                <x-form.input-cluster for="assignment.company_name" :label="__('Company Name')"
                                      wire:model="assignment.company_name"
                                      :placeholder="__('The name of the company')"/>
                <x-form.textarea-cluster for="assignment.company_description" :label="__('About the company')"
                                         wire:model="assignment.company_description"
                                         :placeholder="__('Tell something about your company')"/>
                <x-form.input-cluster for="assignment.email" :label="__('Email')" :placeholder="__('Email')"
                                      wire:model="assignment.email"/>
                <x-form.input-cluster for="assignment.phone_numbers.*" :label="__('Phone number')"
                                      wire:model="assignment.phone_numbers"
                                      :placeholder="__('Phone number')"/>
                <x-form.file-cluster for="existingFiles" :label="__('Existing files')" type="file" multiple
                                     accept="image/jpeg, image/png, image/svg+xml"></x-form.file-cluster>
            </x-form.section>
            <x-form.section>
                <x-form.input-cluster for="assignment.name" :label="__('Project name')"
                                      wire:model="assignment.name"
                                      :placeholder="__('Target name')"/>
                <x-form.input-cluster for="assignment.target_audience" :label="__('Target audience')"
                                      wire:model="assignment.target_audience"
                                      :placeholder="__('Target audience')"/>
                <x-form.textarea-cluster for="assignment.description" :label="__('Assignment description')"
                                         wire:model="assignment.description"
                                         :placeholder="__('A description about the assignment')"/>
                <x-form.input-cluster type="date" for="assignment.deadline" :label="__('Dead line')"
                                      wire:model="assignment.deadline"
                                      min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"></x-form.input-cluster>
            </x-form.section>
        </div>
        <x-form.section class="flex justify-center col-span-2 pt-10">
            <x-form.submit>{{ __('Send') }}</x-form.submit>
        </x-form.section>
    </x-form>
</div>
