import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { useForm } from "@inertiajs/react";

export default function TeamAdd({
    team,
    availableCompetitions,
    onSuccess,
    onCancel,
}) {
    if (!team) return <div></div>;

    const form = useForm({
        competition_id: null,
    });

    const submit = (e) => {
        e.preventDefault();

        form.post(route("teams.competition.store", team.id), {
            onSuccess: () => {
                onSuccess?.();
            },
        });
    };

    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">
                Add {team.name} to a competition
            </h3>
            <form className="flex flex-col mt-4 space-y-4" onSubmit={submit}>
                <InputLabel>Select competition</InputLabel>
                <select
                    value={form.data.competition_id}
                    onChange={(e) =>
                        form.setData("competition_id", e.target.value)
                    }
                >
                    {availableCompetitions?.map((competition) => (
                        <option key={competition.id} value={competition.id}>
                            {competition.name}
                        </option>
                    ))}
                </select>
                <div className="flex gap-2 justify-end mt-8">
                    <SecondaryButton
                        type="button"
                        onClick={() => {
                            form.reset("logo");
                            onCancel?.();
                        }}
                    >
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton type="submit" disabled={form.processing}>
                        Save
                    </PrimaryButton>
                </div>
            </form>
        </div>
    );
}
