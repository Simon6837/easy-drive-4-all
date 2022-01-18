<x-app-layout>
    <div class="flex justify-center mx-auto pt-12">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <table class="divide-y divide-gray-300 ">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Role
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Title
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Notification
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Geldig tot
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                        @foreach($notifications as $notification)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{$notification->id}}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{$notification->role}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">
                                        {{$notification->title}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{$notification->notification}}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{$notification->valid_until}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
