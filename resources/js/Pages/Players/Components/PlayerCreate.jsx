import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { useForm } from "@inertiajs/react";

export default function PlayerCreate({ onSuccess, onCancel }) {
    const form = useForm({
        first_name: null,
        last_name: null,
        birth_date: null,
        nationality: null,
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
            <p>Leave a field empty to generate the values via factory</p>
            <form className="flex flex-col mt-4 space-y-4" onSubmit={submit}>
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
