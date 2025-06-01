<x-layouts.app :title="__('Dashboard')">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-neutral-500 uppercase dark:text-neutral-500">
                                    Name</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-neutral-500 uppercase dark:text-neutral-500">
                                    Neighborhood Association</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-neutral-500 uppercase dark:text-neutral-500">
                                    Dasa Wisma</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-neutral-500 uppercase dark:text-neutral-500">
                                    Coupon Number</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-neutral-500 uppercase dark:text-neutral-500">
                                    Email</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-neutral-500 uppercase dark:text-neutral-500">
                                    Taken At</th>
                                <th scope="col"
                                    class="px-6 py-3 text-end text-xs font-medium text-neutral-500 uppercase dark:text-neutral-500">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                            @forelse ($users as $user)
                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-neutral-800 dark:text-neutral-200">
                                        {{ $user->name }}
                                        @if ($user->is_admin)
                                            <flux:badge color="cyan" class="ml-3">Admin</flux:badge>
                                        @endif
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-neutral-800 dark:text-neutral-200">
                                        {{ $user->neighborhood_association }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-neutral-800 dark:text-neutral-200">
                                        {{ $user->dasa_wisma }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-neutral-800 dark:text-neutral-200">
                                        {{ $user->coupon_number }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-neutral-800 dark:text-neutral-200">
                                        {{ $user->email }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-neutral-800 dark:text-neutral-200">
                                        @if ($user->taken_at !== null)
                                            <flux:badge color="green">Taken</flux:badge>
                                        @else
                                            <flux:badge color="zinc">Not Taken</flux:badge>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <button type="button"
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Delete</button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
