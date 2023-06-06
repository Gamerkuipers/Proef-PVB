<div>
    <x-form wire:submit.prevent="save">
        <div class="grid lg:grid-cols-2 lg:w-full gap-8">
            <x-form.section>
                <x-form.input-cluster for="assignment.company_name" :label="__('Company Name')"
                                      wire:model.lazy="assignment.company_name" required
                                      :placeholder="__('The name of the company')"/>
                <x-form.textarea-cluster for="assignment.company_description" :label="__('About the company')"
                                         wire:model.lazy="assignment.company_description" required
                                         :placeholder="__('Tell something about your company')"/>
                <x-form.input-cluster for="assignment.email" :label="__('Email')" :placeholder="__('Email')"
                                      wire:model.lazy="assignment.email" required/>
                <x-form.input-cluster for="assignment.phone_numbers.*" :label="__('Phone number')"
                                      wire:model.lazy="assignment.phone_numbers" required
                                      :placeholder="__('Phone number')"/>
                <x-form.file-cluster for="existingFiles" :label="__('Images/Logos')" type="file" multiple
                                     wire:model="images"
                                     accept="image/jpeg, image/png, image/svg+xml"></x-form.file-cluster>
            </x-form.section>
            <x-form.section>
                <x-form.input-cluster for="assignment.name" :label="__('Project name')"
                                      wire:model.lazy="assignment.name" required
                                      :placeholder="__('Target name')"/>
                <x-form.input-cluster for="assignment.target_audience" :label="__('Target audience')"
                                      wire:model.lazy="assignment.target_audience" required
                                      :placeholder="__('Target audience')"/>
                <x-form.textarea-cluster for="assignment.description" :label="__('Assignment description')"
                                         wire:model.lazy="assignment.description" required
                                         :placeholder="__('A description about the assignment')"/>
                <x-form.textarea-cluster for="assignment.examples" :label="__('Example Website')"
                                         wire:model.lazy="assignment.examples"
                                         :placeholder="__('Separate links by using a comma , eg: https://first-link.com, https://another-link.com')"/>
                <x-form.input-cluster type="date" for="deadline" :label="__('Dead line')"
                                      wire:model.lazy="deadline" required
                                      min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"></x-form.input-cluster>
            </x-form.section>
        </div>
        <x-form.section class="flex justify-center col-span-2 pt-10">
            <x-form.submit>{{ __('Send') }}</x-form.submit>
        </x-form.section>
    </x-form>
</div>
