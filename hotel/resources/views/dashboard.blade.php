<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    @if(Auth::guard('admin')->check())
                        <h3> Welcome Admin {{Auth::guard('admin')->user()->name}}</h3>
                    @elseif(Auth::guard('manager')->check())
                        <h3> Welcome Manager {{Auth::guard('manager')->user()->name }}</h3>
                    @elseif(Auth::guard('receptionist')->check())
                        <h3> Welcome Receptionist {{Auth::guard('receptionist')->user()->name }}</h3>
                    @elseif(Auth::guard('web')->check())
                        <h3> Welcome {{Auth::user()->name }}</h3>
                    @endif
                    @role('client')
                    Useeer
                    @endrole
                    @role('manager','manager')
                    Im a Manager
                    @endrole
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
