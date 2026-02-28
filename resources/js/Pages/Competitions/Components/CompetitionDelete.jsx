import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { Link } from "@inertiajs/react";

export default function CompetitionDelete({ competition, onCancel }) {
    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">
                Delete competition
            </h3>
            <p>
                Are you sure you want to delete {competition.name}? This action
                cannot be undone.
            </p>
            <div className="flex gap-2 justify-end mt-8">
                <SecondaryButton onClick={() => onCancel()}>
                    Cancel
                </SecondaryButton>
                <Link
                    method="delete"
                    href={route("competitions.destroy", competition.id)}
                >
                    <PrimaryButton>Delete</PrimaryButton>
                </Link>
            </div>
        </div>
    );
}
