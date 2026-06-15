import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextInput from "@/Components/TextInput";
import { useForm } from "@inertiajs/react";

export default function PlayerGenerate({ onSuccess, onCancel }) {
    const form = useForm({
        size: 11,
    });

    const submit = (e) => {
        e.preventDefault();
        form.post(route("players.generate"), {
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
                Players Factory
            </h3>
            <form className="flex flex-col mt-4 space-y-4" onSubmit={submit}>
                <InputLabel htmlFor="size">
                    How many players do you want to generate?
                </InputLabel>
                <TextInput
                    id="size"
                    value={form.data.size}
                    onChange={(e) => form.setData("size", e.target.value)}
                    type="number"
                    placeholder="Size"
                />
                <div className="flex gap-2 justify-end mt-8">
                    <SecondaryButton
                        type="button"
                        onClick={() => {
                            form.reset("size");
                            onCancel?.();
                        }}
                    >
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton type="submit" disabled={form.processing}>
                        Generate
                    </PrimaryButton>
                </div>
            </form>
        </div>
    );
}
