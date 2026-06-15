import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextInput from "@/Components/TextInput";
import { useForm } from "@inertiajs/react";

export default function PlayerCreate({ onSuccess, onCancel }) {
    const form = useForm({
        nationality: null,
        first_name: null,
        last_name: null,
        birth_date: null,
        role: null,
        number: null,
    });

    const submit = (e) => {
        e.preventDefault();
        form.post(route("players.store"), {
            onSuccess: () => {
                onSuccess();
            },
            onError: (error) => {
                console.log({ error });
            },
        });
    };

    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">
                Create a player
            </h3>
            <p className="mt-1 text-sm text-darkGray-600">
                Leave a field empty to generate the values via factory
            </p>
            <form className="flex flex-col mt-4 space-y-4" onSubmit={submit}>
                <div>
                    {/* TODO: Make this a better nationality selector component to re-use */}
                    <InputLabel htmlFor="nationality">Nationality</InputLabel>
                    <TextInput
                        id="nationality"
                        maxLength={2}
                        value={form.data.nationality}
                        onChange={(e) =>
                            form.setData("nationality", e.target.value)
                        }
                        placeholder="Nation code"
                    />
                    {form.errors.nationality && (
                        <div className="mt-1 text-sm text-red-600">
                            {form.errors.name}
                        </div>
                    )}
                </div>
                <div className="flex space-x-4">
                    <div>
                        <InputLabel htmlFor="first_name">First name</InputLabel>
                        <TextInput
                            id="first_name"
                            value={form.data.first_name}
                            onChange={(e) =>
                                form.setData("first_name", e.target.value)
                            }
                            placeholder="First Name"
                        />
                        {form.errors.first_name && (
                            <div className="mt-1 text-sm text-red-600">
                                {form.errors.first_name}
                            </div>
                        )}
                    </div>
                    <div>
                        <InputLabel htmlFor="last_name">Last name</InputLabel>
                        <TextInput
                            id="last_name"
                            value={form.data.last_name}
                            onChange={(e) =>
                                form.setData("last_name", e.target.value)
                            }
                            placeholder="Last Name"
                        />
                        {form.errors.last_name && (
                            <div className="mt-1 text-sm text-red-600">
                                {form.errors.last_name}
                            </div>
                        )}
                    </div>
                    <div>
                        <InputLabel htmlFor="birth_date">Birth Date</InputLabel>
                        <TextInput
                            id="birth_date"
                            type="date"
                            value={form.data.birth_date}
                            onChange={(e) =>
                                form.setData("birth_date", e.target.value)
                            }
                            placeholder="Birth Date"
                        />
                        {form.errors.last_name && (
                            <div className="mt-1 text-sm text-red-600">
                                {form.errors.last_name}
                            </div>
                        )}
                    </div>
                </div>
                <div className="flex space-x-4">
                    <div>
                        <InputLabel htmlFor="role">Role</InputLabel>
                        <select
                            className="rounded-md border-gray-300 shadow-sm focus:border-lightGrey-600 focus:ring-lightGrey-800"
                            onChange={(e) =>
                                form.setData("role", e.target.value)
                            }
                        >
                            <option value="">-</option>
                            <option value="Goalkeeper">Goalkeeper</option>
                            <option value="Defender">Defender</option>
                            <option value="Midfielder">Midfielder</option>
                            <option value="Forward">Forward</option>
                        </select>
                    </div>
                    <div>
                        <InputLabel htmlFor="number">Number</InputLabel>
                        <TextInput
                            id="number"
                            type="number"
                            min="1"
                            max="99"
                            value={form.data.number}
                            onChange={(e) =>
                                form.setData("number", e.target.value)
                            }
                            placeholder="Number"
                        />
                        {form.errors.number && (
                            <div className="mt-1 text-sm text-red-600">
                                {form.errors.number}
                            </div>
                        )}
                    </div>
                </div>
                <div className="flex gap-2 justify-end mt-8">
                    <SecondaryButton
                        type="button"
                        onClick={() => {
                            form.reset();
                            onCancel?.();
                        }}
                    >
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton type="submit" disabled={form.processing}>
                        Create
                    </PrimaryButton>
                </div>
            </form>
        </div>
    );
}
