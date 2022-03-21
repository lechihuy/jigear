@extends('admin.layouts.app')

@php
    $title = __('Tạo người dùng');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="createUserForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- Email --}}
        <x-admin.panel.item label="Email" :required="true">
            <x-admin.form.text name="email" x-model="email" />
        </x-admin.panel.item>

        {{-- Password --}}
        <x-admin.panel.item label="Mật khẩu" :required="true">
            <x-admin.form.text name="password" x-model="password" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.users.index')" />
        </div>

        <div class="ml-auto">
            <x-admin.button.confirm-creation />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('createUserForm', () => ({
    email: '',
    password: '',
    loading: false,
    submit() {
      this.loading = true;

      axios.post(route('admin.users.store'), {
        email: this.email,
        password: this.password
      }).then(res => {
        window.location.href = route('admin.users.show', { user: res.data.user.id });
      }).catch(err => {
        Alpine.store('toast').show('danger', err.response.data.message)
      }).finally(() => {
        this.loading = false;
      })
    }
  }));
});
</script>
@endpush
