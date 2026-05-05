import { Head, Link, usePage } from '@inertiajs/react';
import CreateUserModal from '@/components/user/CreateUserForm';
import { useState, useEffect } from 'react';
import { Role } from '@/models/Role';

type User = {
    id: string;
    name: string;
    email: string;
    is_active: boolean;
};

type Store = {
    id: string;
    name: string;
};

type Props = {
    users: User[];
    roles: Role[];
    stores: Store[];
    canApproveUsers: boolean;
};

type PageProps = {
    flash: {
        success?: string;
    };
};

export default function UsersIndex({ users, roles, stores, canApproveUsers }: Props) {
    const [open, setOpen] = useState(false);
    const { flash } = usePage<PageProps>().props;
    const [showMessage, setShowMessage] = useState(Boolean(flash.success));

    useEffect(() => {
        if (!flash.success) {
            setShowMessage(false);
            return;
        }

        setShowMessage(true);

        const timer = setTimeout(() => setShowMessage(false), 5000);

        return () => clearTimeout(timer);
    }, [flash.success]);

    return (
        <>
            <Head title="Users" />

            <div className="mx-auto max-w-5xl p-6">
                <h1 className="mb-6 text-2xl font-semibold">Users</h1>

                {showMessage && flash.success && (
                    <div className="mb-4 rounded bg-green-100 p-3 text-green-800">
                        {flash.success}
                    </div>
                )}

                <div className="overflow-x-auto">
                    <div className="flex justify-end items-center mb-6">
                        <button
                            onClick={() => setOpen(true)}
                            className="px-4 py-2 bg-blue-600 text-white rounded"
                        >
                            + Add user
                        </button>
                    </div>

                    <table className="min-w-full border border-gray-200 dark:border-gray-700">
                        <thead className="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th className="px-4 py-2 text-left">Name</th>
                            <th className="px-4 py-2 text-left">Email</th>
                            <th className="px-4 py-2 text-left">Status</th>
                            <th className="px-4 py-2 text-left">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        {users.length === 0 && (
                            <tr>
                                <td colSpan={4} className="px-4 py-6 text-center text-gray-500">
                                    No users found.
                                </td>
                            </tr>
                        )}

                        {users.map((user) => (
                            <tr
                                key={user.id}
                                className="border-t border-gray-200 dark:border-gray-700"
                            >
                                <td className="px-4 py-2">{user.name}</td>
                                <td className="px-4 py-2">{user.email}</td>
                                <td className="px-4 py-2">
                                    <span
                                        className={user.is_active ? 'text-green-700' : 'text-amber-700'}
                                    >
                                        {user.is_active ? 'Approved' : 'Pending approval'}
                                    </span>
                                </td>
                                <td className="px-4 py-2">
                                    <Link href={`/users/${user.id}`} className="text-blue-600">
                                        View
                                    </Link>
                                    {!user.is_active && canApproveUsers && (
                                        <Link
                                            href={`/users/${user.id}/approve`}
                                            method="post"
                                            as="button"
                                            preserveScroll
                                            className="ml-4 text-green-600"
                                        >
                                            Approve
                                        </Link>
                                    )}
                                </td>
                            </tr>
                        ))}
                        </tbody>
                    </table>

                    <CreateUserModal
                        open={open}
                        onClose={() => setOpen(false)}
                        roles={roles}
                        stores={stores}
                    />
                </div>
            </div>
        </>
    );
}
